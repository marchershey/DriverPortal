@if(count($errors) > 0 )
<div class="text-center text-xs font-semibold p-2 rounded --  bg-red-100 text-red-500">
    {!!$errors->first()!!}
</div>
@endif

<script>
    window.addEventListener('alert', event => {
        var type = event.detail.type;
        var title = event.detail.title;
        var text = event.detail.text;
        var time = event.detail.time || 4000;

        console.log(time);

        if(type == 'info' || type == null) {
            toastr.info(text, title, {timeOut: time})
        }else if (type == 'success'){
            toastr.success(text, title, {timeOut: time})
            
        }else if (type == 'warning') {
            toastr.warning(text, title, {timeOut: time})
            
        }else if (type == 'error') {
            toastr.error(text, title, {timeOut: time})
        }
    })
</script>