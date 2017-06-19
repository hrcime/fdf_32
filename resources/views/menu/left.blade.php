<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
        {{ trans('layout.menu.categories') }}
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        @foreach (Helper::getCategories() as $key => $name)
            <li>
                <a href="{{ action('ProductController@showProductByCategory', $key) }}">{{ $name }}</a>
            </li>
        @endforeach
    </ul>
</li>
