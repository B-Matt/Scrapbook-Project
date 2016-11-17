@extends('layouts.app')

@section('content')
<form class="form-signin" style="margin-top:4%;max-width:900px;" method="post" action="{{ url('/upload') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>
    <div class="upload-header">
        <h2 class="navbar-brand form-signin-heading">Scrapbook</h2><br>
        <span class="upload-subtitle navbar-brand form-signin-heading form-muted">Image upload</span>
    </div>

    <div class="row upload-row">
        <div class="col-sm-4" style="margin-top:2%">
            <input type="text" name="name" class="form-control" placeholder="title" required />
            <input type="text" name="description" class="form-control" placeholder="description" required />
            <input type="file" name="file" id="image-file" class="form-control" onchange="showImagePreview(this)" accept="image/*" required />
			
			<select class="form-control upload-dropdown" name="isPrivate">
				<option value="0">Public</option>
				<option value="1">Private</option>
			</select>
			
            <select class="form-control upload-dropdown" name="filter" onchange="showImageFilter(this.value)">
                <option value="none">None</option>
				<option value="antique">Antique</option>
                <option value="blur">Blur</option>
                <option value="chrome">Chrome</option>
                <option value="monopin">Monopin</option>
                <option value="retro">Retro</option>
                <option value="velvet">Velvet</option>
                <option value="blackwhite">BlackWhite</option>
                <option value="boost">Boost</option>
                <option value="dreamy">Dreamy</option>
                <option value="sepia">Sepia</option>
                <option value="syncity">SynCity</option>
            </select>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Upload</button>
        </div>
        <div class="col-sm-4">
            <img id="upload-preview-image" width="292" height="292" src="data:image/gif;base64,R0lGODlhAQABAIAAAHd3dwAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==" alt="Preview Image" />
        </div>
    </div>
</form>
@endsection