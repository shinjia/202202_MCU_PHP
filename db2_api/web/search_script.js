/* jquery.js */

var url = 'http://localhost/myweb/db2_api/api/read_find.php';

var ext = '&callback=?';

//url = url + ext;


$('#btn').click(function(){
  $('#message').html('Loading...');
  $.ajax({
    type: "GET",
    data: {
      key: $('#key').val(),
    },
    dataType: "json",
    url: url,
    success: function(data){
      
      var ary = data.records;     // 須依據資料內容修改
      console.log(ary[0]);
      $('#message').html('資料已成功讀取');
      $('#showarea').html(JSON.stringify(ary[0]));
      func_show(ary);
    },
    complete: function(){
      $('#message').html('資料讀取完畢');
    },
    error: function(){ 
      $('#message').html('資料讀取發生錯誤');
    },
  }); // end of ajax()
}); // end of click()



var func_show = function(ary){
  var items = [];
  $.each(ary, function(i, item){
    
    // 取得各楝位的資料
    var str = '';
    str += '<td>' + item.usercode + '</td>';
    str += '<td>' + item.username  +  '</td>';
    str += '<td>' + item.address + '</td>';
    str += '<td>' + item.birthday + '</td>';
    str += '<td>' + item.height + '</td>';
    str += '<td>' + item.weight + '</td>';
    str += '<td>' + item.remark + '</td>';
     
    items.push('<tr>'+str+'</tr>');
  }); // end of each()
  
  $('#tablelist').append( items.join('') );
};


document.getElementById('source').innerHTML = '<a href="' + url + '">' + url + '</a>';