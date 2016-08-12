/*
*计数器
*/
var newsId = {};
$('.news_count').each(function(index,ele){
    newsId[index] = $(this).attr('news_id');
    
});

// console.log("newsId",newsId);

url = '/singwa/index.php?c=index&a=getCount';
$.post(url,newsId,function(res){
    if(res.status == 1){
//        console.log(res.data);
        $.each(res.data,function(news_id,count){
          $('.node-' + news_id).html(count);
        });
    }
},"JSON");