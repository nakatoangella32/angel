@if (count($errors) > 0)
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong><i class="fa fa-exclamation-circle fa-lg fa-fw"></i>Error</strong><br>
    <ul style="list-style-type: square;">
        @foreach ($errors->all() as $error)
        @if ($errors->has('photos.*'))
        <span>
            <strong>File upload failed probably because; <br>
                1. File could be bigger than expected. kindly ensure file is of less than 3 Mbs <br>
                2. You have uploaded a wrong file type. Only JPEG, JPG, SVG, BMP or PNG are allowed <br>
            </strong>
        </span>
        @else
        <li>{!! $error !!} </li>
        @endif
        @endforeach
    </ul>
</div>
@endif

@if (Session::has('success_message'))
<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
        <i class="fa fa-check-circle fa-lg fa-fw"></i> Success.
    </strong>
    {{ Session::get('success_message') }}
</div>
@elseif(Session::has('warning_message'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
        <i class="fa fa-info-circle fa-lg fa-fw"></i> Warning.
    </strong>
    {{ Session::get('warning_message') }}
</div>
@elseif(Session::has('message'))
<div class="alert alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>
        <i class="fa fa-info-circle fa-lg fa-fw"></i>
    </strong>
    {{ Session::get('message') }}
</div>
@endif
