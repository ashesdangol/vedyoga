class Notes {
  constructor() {
    this.events();
  }
  events(){
    $('.delete-note').on('click', this.deleteNote);
    $('.edit-note').on('click', this.editNote)
  }

  // own methods
  deleteNote(e){
    // the info is stored in deleteNote on click and access its wiht
    var thisNote = $(e.target).parents("li");
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-NONCE', yogaData.nonce);
      } ,
      url:yogaData .root_url+'/wp-json/wp/v2/note/'+thisNote.data('id'),
      type:'DELETE',
      success:(response)=> {
        thisNote.slideUp();
        console.log('Congrats');
        console.log(response);
      },
      error:(response)=> {
        console.log('Sorry');
        console.log(response);
      }
    })
  }
  editNote(e){
    var thisNote = $(e.target).parents("li");
    thisNote.find(".note-title-field, .note-body-field").removeAttr('readonly').addClass('note-active-field');
    thisNote.find(".update-note").addClass('update-note--visible');
  }
}

export default Notes;
