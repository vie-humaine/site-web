    <h1><a href="#"><?= $article->name ?></a></h1>
    <h6>Publié le <?= $article->ModifiedDate ?>, dans la catégorie <?= $this->Html->link($article->category->name,[]) ?></h6>
    <p>
        <?= $article->MarkdownContent ?>
    </p>
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
