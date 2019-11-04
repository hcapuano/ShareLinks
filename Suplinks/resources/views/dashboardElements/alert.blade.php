<!-- Code d'alert en fonction de l'état retourné par les controllers -->
<div class="row my-4">
    @switch($state)
        @case('success')
        <div class="alert alert-success alert-dismissible fade show my-auto" role="alert">
            <i class="icon-ok"></i> Link created : {{$lastOne->name}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @break
        @case('cancel')
        <div class="alert alert-danger alert-dismissible fade show my-auto" role="alert">
            <i class="icon-cancel"></i> Link not available, Last link updated : {{$lastOne->name}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @break
        @default
        <div class="alert alert-info alert-dismissible fade show my-auto" role="alert">
            <i class="icon-info"></i>Last link updated : {{$lastOne->name}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endswitch
</div>