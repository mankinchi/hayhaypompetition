<div class="row video-modal">
    <div class="col-md-8 col-md-offset-2 main-video">
        <div class="video" link="uTOF6Xpldgo">
            <div class="play-button">
                <i class="fa fa-play"></i>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".video").hover(function() {
        $(this).find('i').addClass('hover');
    }, function() {
        $(this).find('i').removeClass('hover');
    });

    $(".video").each(function(index, el) {
        setBackground($(this));
    });

    $(".main-video .video").click(function() {
        var iframe = $("<iframe>", {
            'frameborder': '0',
            'width': '100%',
            'height': '500px',
            'allowfullscreen' : '',
            'src' : 'https://www.youtube.com/embed/' + $(this).attr('link') + '?autoplay=1'
        });
        $(this).append(iframe);
    });

    function setBackground(element) {
        var link = 'http://img.youtube.com/vi/' + $(element).attr('link') +'/maxresdefault.jpg';
        $(element).css({
            'background': "url('"+ link +"')",
            'background-size': 'cover',
            'background-position': 'center'
        });
    }
</script>
