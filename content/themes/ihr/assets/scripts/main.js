/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

	// Use this variable to set up the common and page specific functions. If you
	// rename this variable, you will also need to rename the namespace below.
	var Sage = {
		// All pages
		'common': {
			action_load_posts: 'ajax_load_posts',
			init: function() {
				// JavaScript to be fired on all pages
			},
			finalize: function() {
				// JavaScript to be fired on all pages, after page specific JS is fired
			},
			load_posts: function (pTopicsFilter, pOffset) {
		        Sage.common.loading = true;
		        var itemCountReturned;

		        if (pOffset === 0) {
		          // only clear current contents if the offset is 0 because otherwise we are loading more
		          $('.loader').removeClass('all-posts-loaded');

		          $('#posts-wrap').empty();
		        }

		        $('.loader').addClass('loading');
		        var data = {
		          action: Sage.common.action_load_posts,
		          topics_filter: pTopicsFilter,
		          post_offset: pOffset
		        };

		        $.get(ihr.ajaxurl, data, function (html) {
		          //console.log(data,html);
		          itemCountReturned = $(html).filter(".entry-container").length;
		          if (html === '') {
		            $('.loader').addClass('all-posts-loaded');
		          } else {
		            $('#posts-wrap').append(html);

		          }
		          $('.loader').removeClass('loading');
		          Sage.common.loading = false;


		          if (itemCountReturned < 10) {
		            $('.loader').addClass('all-posts-loaded');
		          }
		        });

		      }
		},
		// Home page
		'home': {
			init: function() {
				// JavaScript to be fired on the home page
			},
			finalize: function() {
				// JavaScript to be fired on the home page, after the init JS
			}
		},
		// About us page, note the change from about-us to about_us.
		'blog': {
			init: function() {
				// JavaScript to be fired on the about us page
				$("#blog-filters a").eq(0).parent().addClass("selected");

				$(".load-more").click(function(){
					if (Sage.common.loading) {
						return;
					}
					// get current filter
					var topics_filter = $('#blog-filter .selected > a').attr("href");

					// get current offset
					var offset = $('#posts-wrap .entry-container').length;
					//offset++;

					Sage.common.load_posts(topics_filter, offset);
				})

				$('#blog-filters a').click(function (e) {

					e.preventDefault();
					if (Sage.common.loading) {
						return;
					}

					
					if (!$(this).parent().hasClass('selected')) {

						var topics_filter = '';

						if ($(this).parent().hasClass('cat-item-all')){

							topics_filter = '';

						}else{

							topics_filter = $(this).attr("href");
						}

						$(this).parent().parent().find("li").removeClass('selected');
						$(this).parent().addClass('selected');

						Sage.common.load_posts(topics_filter, 0);
					}

				});

			}
		}
	};

	// The routing fires all common scripts, followed by the page specific scripts.
	// Add additional events for more control over timing e.g. a finalize event
	var UTIL = {
		fire: function(func, funcname, args) {
			var fire;
			var namespace = Sage;
			funcname = (funcname === undefined) ? 'init' : funcname;
			fire = func !== '';
			fire = fire && namespace[func];
			fire = fire && typeof namespace[func][funcname] === 'function';

			if (fire) {
				namespace[func][funcname](args);
			}
		},
		loadEvents: function() {
			// Fire common init JS
			UTIL.fire('common');

			// Fire page-specific init JS, and then finalize JS
			$.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
				UTIL.fire(classnm);
				UTIL.fire(classnm, 'finalize');
			});

			// Fire common finalize JS
			UTIL.fire('common', 'finalize');
		}
	};

	// Load Events
	$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.
