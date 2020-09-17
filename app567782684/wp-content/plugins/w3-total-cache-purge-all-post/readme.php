<div class="wrap">  
	<h2>W3 Total Cache Purge All Page Readme</h2>

	<p>W3Total Cache Page caching mechanism is somewhat very confusing. Which page to purge ? does the archive need to purge to? how about the widget?</p>
	<p>We know that W3 Total Cache already have mechanism to purge archive page with similiar tag / category (post term purge). However this is not sufficient.</p>
	<p>Consider this scenario :</p>
	<p>Web sitemap :</p>
	<ul>
		<li><i></i>Home
			<ul>
				<li><i></i>category/category_1 </li>
				<li><i></i>post_type_2 </li>
				<li><i></i>pages_x (contain post_type_2 with custom WP_Query )</li>
			</ul>
		</li>
	</ul>
	<p>With normal W3 Total cache if you publish post with post_type_2 and category 1 the /pages_x will not purge !</p>
	<p>Our solution is to purge all the page cache during a post is marked publish.</p>
	<p>When all page is purged ?</p>
	<ol>
		<li>There is new post marked as publish (updated or new post)</li>
		<li>Post move to trash</li>
	</ol>
	<h2>Installation</h2>
	<ol>
		<li>Grap the plugin from from wordpress plugin directory or Upload w3-total-cache-purge-all-post folder to the /wp-content/plugins/ directory</li>
		<li>Activate W3 Total Cache Plugin, <strong>DISABLE ‘Prime post cache on publish’ on page cache option</strong>. It will kill your performace</li>
		<li>Activate the plugin</li>
	</ol>
	<h2>Frequently Asked Questions</h2>
	<p><strong>Its slow my website !!</strong></p>
	<p>If you don’t like it just turn it off, it’s experimental anyway</p>
	<h2>Donation</h2>
	<p>Treat us a coffee! Donation can be make from http://tonjoo.com/donate/ Thank you!</p>

</div> 