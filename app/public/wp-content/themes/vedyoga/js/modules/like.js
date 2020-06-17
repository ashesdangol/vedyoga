class Like {
  constructor() {
    this.events();
  }
  events(){
    $('.like-box').on('click',this.ourCickDispatcher.bind(this));
  }

  // methods
  ourCickDispatcher(e){
    var currentLikeBox = $(e.target).closest(".like-box");
    if(currentLikeBox.attr('data-exists') == 'yes'){
      this.deleteLike(currentLikeBox);
    }else{
      this.createLike(currentLikeBox);
    }
  }
  createLike(currentLikeBox){
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-NONCE', yogaData.nonce);
      },
      url:yogaData.root_url + '/wp-json/yoga/v1/manageLike',
      type:'POST',
      data:{'instructorId':currentLikeBox.data('instructor')},
      success:(response)=>{
        currentLikeBox.attr('data-exists','yes');
        var likeCount =parseInt(currentLikeBox.find('.like-count').html(), 10);
        likeCount++;
        currentLikeBox.find('.like-count').html(likeCount);
        currentLikeBox.attr('data-like',response);
        console.log(response);
      },
      error:(response)=>{
        console.log(response);
      }
    });
  }
  deleteLike(currentLikeBox){
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-NONCE', yogaData.nonce);
      },
      url:yogaData.root_url + '/wp-json/yoga/v1/manageLike',
      data:{'like': currentLikeBox.attr('data-like')},
      type:'DELETE',
      success:(response)=>{
        currentLikeBox.attr('data-exists','no');
        var likeCount =parseInt(currentLikeBox.find('.like-count').html(), 10);
        likeCount--;
        currentLikeBox.find('.like-count').html(likeCount);
        currentLikeBox.attr('data-like','');
        console.log(response);
      },
      error:(response)=>{
        console.log(response);
      }
    });
  }

}

export default Like;
