<?php
  $haml = new HamlParser(array('style' => 'nested', 'ugly' => false));
  $page = $haml->parse('partials/footer.haml');
  eval('?'.'>'.$page);
?>

<script src="/js/lib/jquery-1.7.1.min.js"></script>
<script src="/js/lib/less-1.3.0.min.js"></script>
<script src="/js/plugins.js"></script>
<script src="/js/script.js"></script>
</body>
</html>
