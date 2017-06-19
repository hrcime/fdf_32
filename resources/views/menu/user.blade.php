<li>
    <a href="{{ action('User\HomeController@show') }}">{{ trans('layout.menu.profile') }}</a>
</li>
<li>
    <a href="{{ action('User\HomeController@showFormPassword') }}">{{ trans('layout.menu.change-password') }}</a>
</li>
<li>
    <a href="{{ action('OrderController@index') }}">{{ trans('layout.menu.order') }}</a>
</li>
<hr>
