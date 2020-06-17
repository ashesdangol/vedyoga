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
    if(currentLikeBox.data('exists') == 'yes'){
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
        console.log(response);
      },
      error:(response)=>{
        console.log(response);
      }
    });
  }
  deleteLike(){
    $.ajax({
      url:yogaData.root_url + '/wp-json/yoga/v1/manageLike',
      type:'DELETE',
      success:(response)=>{
        console.log(response);
      },
      error:(response)=>{
        console.log(response);
      }
    });
  }

}

export default Like;
