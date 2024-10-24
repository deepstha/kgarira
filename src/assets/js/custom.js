var list = 2;
jQuery(function($) {
    $('body').on('click', '.loadmore', function() {
        console.log('checked load more');
        var data = {
            'action': 'load_posts_by_ajax',
            'page': list,
            'security': blog.security,
            'offset': list 
        };
 
        $.post(blog.ajaxurl, data, function(response) {
            if($.trim(response) != '') {
                $('.blog-posts').append(response);
                list++;
            } else {
                $('.loadmore').hide();
            }
        });
    });

});


// var list = 3;
// jQuery(function($) {
//     $('body').on('click', '.show-more', function() {
      
//         var data = {
//             'action': 'show_more_by_ajax',
//             'page': list,
//             'security': knowledge.security,
//             'offset': list 
//         };
//         console.log('checked show more', data);
 
//         $.post(knowledge.ajaxurl, data, function(response) {
//             console.log('checked show more after post');
//             if($.trim(response) != '') {
//                 $('.card-list .list-icon').append(response);
//                 list++;
//                 console.log('checked show more after trim');
//             } else {
//                 $('.show-more').hide();
//             }
//         });
//     });

// });

