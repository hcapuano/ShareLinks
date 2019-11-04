<!-- Formulaire de création de lien, après les alertes, dans le dashboard -->
<form action="" method="post" >
    @csrf

    <div class="form-group row my-auto justify-content-md-center">
        <label for="name" class="col-form-label">{{ __('Name') }}</label>

        <div class="col-md-auto mx-4 my-auto">
            <input id="name" name="name" type="text" placeholder="name your url" value="{{ (isset($name)) ? $name : '' }}" class="form-control" required autofocus>
        </div>

        <label for="url" class="col-form-label">{{ __('URL') }}</label>

        <div class="col-md-auto mx-4 my-auto">
            <input id="url" name="url" type="text" value="{{ (isset($url)) ? $url : '' }}" placeholder="http://site.example" required class="form-control">
        </div>

        <div class="col-md-auto mx-4">
            <input type="submit" class="btn btn-style" value="Generate">
        </div>
    </div>
</form>