<?php
namespace AvoRed\Framework\Graphql\Queries\Admin\Catalog\Category;

use AvoRed\Framework\Database\Contracts\CategoryModelInterface;
use Closure;
use GraphQL\Type\Definition\Type;
use GraphQL\Type\Definition\ResolveInfo;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\Query;

class CategoryTableQuery extends Query
{
    protected $attributes = [
        'name' => 'adminCategoryTable',
        'description' => 'A query'
    ];

    /**
     * Category Repository
     * @var AvoRed\Framework\Database\Repository\CategoryRepository
     */
    protected $categoryRepository;

    /**
     * All Category construct
     * @param \AvoRed\Framework\Database\Contracts\CategoryModelInterface $categoryRepository
     * @return void
     */
    public function __construct(CategoryModelInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Return type for these query
     * @return \GraphQL\Type\Definition\Type
     */
    public function type(): Type
    {
        return Type::listOf(GraphQL::type('category'));
    }

    /**
     * Passed arguments for this query
     * @return array
     */
    public function args(): array
    {
        return [];
    }

    public function authorize($root, array $args, $ctx, ResolveInfo $resolveInfo = null, Closure $getSelectFields = null): bool
    {
        return Auth::guard('admin_api')->check();
    }

    /**
     * Resolve Query to get pass an information
     * @param mixed $root
     * @param array $args
     * @param mixed $context
     * @param \GraphQL\Type\Definition\ResolveInfo $resolveInfo
     * @param midex $getSelectFields
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function resolve($root, $args, $context, ResolveInfo $resolveInfo, Closure $getSelectFields): Collection
    {
        return $this->categoryRepository->all();
    }
}
