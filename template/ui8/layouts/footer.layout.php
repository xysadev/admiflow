	<?php use Xysdev\Admiflow\Config; ?>
		<footer class="pb-4">
		  <div class="container-fluid px-4">
		    <span class="d-block lh-sm small text-muted text-end">
		      <?= Config::getTemplateConfig('app_name'); ?> &copy;
		      <script>
		        document.write(new Date().getFullYear())
		      </script>
		    </span>
		    <span class="d-block lh-sm small text-muted text-end">
		      <?= get_developer_credit(); ?>
		    </span>
		  </div>
		</footer>