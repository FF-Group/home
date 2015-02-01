<script src="http://widgets.twimg.com/j/2/widget.js"></script>
<script type="text/javascript">
new TWTR.Widget({
  version: 2,
  type: 'profile',
  rpp: 3,
  interval: 4000,
  width: 246,
  height: 200,
  theme: {
    shell: {
      background: 'none',
      color: '#fff'
    },
    tweets: {
      background: 'none',
      color: '#fff',
      links: 'none'
    }
  },
  features: {
    scrollbar: false,
    loop: false,
    live: false,
    hashtags: true,
    timestamp: true,
    avatars: false,
    behavior: 'default'
  }
}).render().setUser('<?php the_author_meta('twitter'); ?>').start();
</script>