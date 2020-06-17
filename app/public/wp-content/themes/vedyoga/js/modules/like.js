class Like {
  constructor() {
    this.events();
  }
  events(){
    $('.like-box').on('click',this.ourCickDispatcher.bind(this));
  }

  // methods
  ourCickDispatcher(){
    if($('.like-box').data('exists') == 'yes'){
      this.deleteLike();
    }else{
      this.createLike();
    }
  }
  createLike(){
    alert('create test Message');
  }
  deleteLike(){
    alert('delete test message');
  }

}

export default Like;
