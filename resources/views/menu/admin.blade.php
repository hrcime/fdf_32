<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        {{ trans('layout.menu.admin-user') }}
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ action('Admin\UserController@index') }}">{{ trans('layout.menu.list') }}</a>
            <a href="{{ action('Admin\UserController@create') }}">{{ trans('layout.menu.create') }}</a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        {{ trans('layout.menu.admin-category') }}
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ action('Admin\CategoryController@index') }}">{{ trans('layout.menu.list') }}</a>
            <a href="{{ action('Admin\CategoryController@create') }}">{{ trans('layout.menu.create') }}</a>
        </li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        {{ trans('layout.menu.admin-product') }}
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li>
            <a href="{{ action('Admin\ProductController@index') }}">{{ trans('layout.menu.list') }}</a>
            <a href="{{ action('Admin\ProductController@create') }}">{{ trans('layout.menu.create') }}</a>
        </li>
    </ul>
</li>

<li>
    <a href="{{ action('Admin\OrderController@index') }}">{{ trans('layout.menu.admin-order') }}</a>
</li>

<li>
    <a href="{{ action('Admin\SuggestController@index') }}">{{ trans('layout.menu.admin-suggest') }}</a>
</li>
