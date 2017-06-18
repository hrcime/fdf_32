{{ Form::open(['action' => 'FilterController@index', 'method' => 'GET']) }}
<div class="row">
    <div class="col-md-3">
        <p>{{ trans('layout.filter.keyword') }}</p>
        <p>
            {{ Form::text('name', null, [
                'class' => 'form-control', 'placeholder' => trans('layout.filter.keyword')]) }}
        </p>
    </div>
    <div class="col-md-4">
        <p>{{ trans('layout.filter.price') }}</p>
        <div class="form-inline">
            {{ Form::text('from', null, ['class' => 'form-control', 'placeholder' => trans('layout.filter.from')]) }}
            {{ Form::text('to', null, ['class' => 'form-control', 'placeholder' => trans('layout.filter.to')]) }}
        </div>
    </div>
    <div class="col-md-1">
        <p>{{ trans('layout.filter.rate') }}</p>
        <p>
            {{ Form::number('avg_point', null, ['class' => 'form-control', 'min' => config('settings.filter.rate.min'),
                'max' => config('settings.filter.rate.max')]) }}
        </p>
    </div>
    <div class="col-md-2">
        <p>{{ trans('layout.filter.category') }}</p>
        <p>
            {{ Form::select('category', Helper::getCategories(), null,
                ['placeholder' => trans('layout.filter.default'), 'class' => 'form-control']) }}
        </p>
    </div>
    <div class="col-md-2">
        <p>{{ Form::submit(trans('layout.filter.b-filter'), ['class' => 'btn btn-primary btn-lg btn-block']) }}</p>
    </div>
</div>
{{ Form::close() }}
