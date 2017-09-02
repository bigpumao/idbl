<div class="row">
    <div 
        class="fb-like col-md-1"
        data-href="{{$url}}"
        data-share="false"
        data-width="450"
        data-show-faces="true"
        data-layout="button_count">
    </div> 
    <div class="col-md-1" id="fb-root"></div>
    <div class="fb-share-button col-md-1" data-href="{{$url}}" data-layout="button_count" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="{{$url}}">Compartilhar</a></div>
</div>

  


<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.10&appId=176243222781930";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
