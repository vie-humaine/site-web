jQuery(document).ready(function($)
{
        $('div.flash .right a').click(function(e){
            $(this).parent().parent().hide(100);
        });

        hljs.initHighlightingOnLoad();
});
