<article>
    <h1><a href="#"><?= $article->name ?></a></h1>

    <div class="row">
        <div class="large-9 columns show-for-medium-up">
            <h6>Publié le <?= $article->ModifiedDate ?>, dans la catégorie <?= $this->Html->link($article->category->name,[]) ?></h6>
        </div>
        <div class="large-3 columns show-for-large-up">

            <!-- twitter -->
            <a href="https://twitter.com/share" class="twitter-share-button" data-via="minus78_" data-count="none" data-dnt="true">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            &nbsp;
            <a href="https://twitter.com/minus78_" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @minus78_</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
            <!-- /twitter -->
            <!-- &nbsp;
            <span class="disqus-comment-count">
                <i class="fa fa-comments"> </i> <span class="disqus-comment-count" data-disqus-identifier="article-<?= $article->id ?>-<?= $article->slug ?>"></span>
            </span> -->
        </div>
    </div>

    <p>
        <?= $article->MarkdownContent ?>
    </p>
</article>
<br>

<!-- disqus -->
<div id="disqus_thread"></div>
<script type="text/javascript">
/* * * CONFIGURATION VARIABLES * * */
var disqus_shortname = 'viehumaine';
var disqus_identifier = 'article-<?= $article->id ?>-<?= $article->slug ?>';

/* * * DON'T EDIT BELOW THIS LINE * * */
(function() {
    var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
    dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
    (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
})();
/* * * DON'T EDIT BELOW THIS LINE * * */
(function () {
    var s = document.createElement('script'); s.async = true;
    s.type = 'text/javascript';
    s.src = '//' + disqus_shortname + '.disqus.com/count.js';
    (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
}());
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript" rel="nofollow">comments powered by Disqus.</a></noscript>
<!-- /disqus -->

<script>hljs.initHighlightingOnLoad();</script>
<?= $this->Html->css('highlight',['block' => 'css']); ?>

<?php
// title
$this->assign('title', $article->name);
?>
