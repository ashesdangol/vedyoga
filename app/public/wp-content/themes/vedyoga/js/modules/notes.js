class Notes {
  constructor() {
    this.events();
  }
  events(){
    $('#my-notes').on('click',".delete-note", this.deleteNote);
    $('#my-notes').on('click','.edit-note', this.editNote.bind(this));
    $('#my-notes').on('click','.update-note', this.updateNote.bind(this));
    $('.submit-note').on('click', this.createNote.bind(this));
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
        if(response.userNoteCount < 5 ){
          $('.note-limit-message').removeClass('note-limit-active');
        }
      },
      error:(response)=> {
        console.log('Sorry');
        console.log(response);
      }
    })
  }
  updateNote(e){
    // the info is stored in deleteNote on click and access its wiht
    var thisNote = $(e.target).parents("li");
    var ourUpdatedPost = {
      'title' : thisNote.find('.note-title-field').val(),
      'content' : thisNote.find('.note-body-field').val()
    };
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-NONCE', yogaData.nonce);
      } ,
      url:yogaData .root_url+'/wp-json/wp/v2/note/'+thisNote.data('id'),
      type:'POST',
      data: ourUpdatedPost,
      success:(response)=> {
        this.makeNoteReadOnly(thisNote);
        console.log('Congrats');
        console.log(response);
      },
      error:(response)=> {
        console.log('Sorry');
        console.log(response);
      }
    })
  }
  createNote(e){
    var ourNewPost = {
      'title' : $('.new-note-title').val(),
      'content' : $('.new-note-body').val(),
      'status' : 'publish'
    };
    $.ajax({
      beforeSend: (xhr) =>{
        xhr.setRequestHeader('X-WP-NONCE', yogaData.nonce);
      } ,
      url:yogaData .root_url+'/wp-json/wp/v2/note/',
      type:'POST',
      data: ourNewPost,
      success:(response)=> {
        $(".new-note-title, .new-note-body").val('');
        $(`
          <li data-id='${response.id}'>
            <input readonly class="note-title-field" type="text" name="" value="${response.title.raw}">
            <span class="edit-note"><i class="fa fa-pencil" aria-hidden="true"> Edit </i></span>
            <span class="delete-note"><i class="fa fa-trash-o" aria-hidden="true"> Delete </i></span>
            <span class="update-note hidden-btn"><i class="fa fa-arrow-right" aria-hidden="true"> Save </i></span>
            <textarea readonly class="note-body-field" name="name" rows="8" cols="80">${response.content.raw}</textarea>
          </li>
          `).prependTo("#my-notes").hide().slideDown();
        console.log('Congrats');
        console.log(response);
      },
      error:(response)=> {
        if(response.responseText == "You have reached yout note limit"){
          $('.note-limit-message').addClass('note-limit-active');
        }
        console.log('Sorry');
        console.log(response);
      }
    })
  }
  editNote(e){
    var thisNote = $(e.target).parents("li");
    if(thisNote.data("state")=="editable"){
      // make readonly
      this.makeNoteReadOnly(thisNote);
    }else{
      // make makeNoteEditable
      this.makeNoteEditable(thisNote);
    }
  }
  makeNoteEditable(thisNote){
    thisNote.find(".edit-note").html('<i class="fa fa-times" aria-hidden="true"> Cancel </i>');
    thisNote.find(".note-title-field, .note-body-field").removeAttr('readonly').addClass('note-active-field');
    thisNote.find(".update-note").addClass('update-note--visible');
    thisNote.data('state','editable');
  }
  makeNoteReadOnly(thisNote){
    thisNote.find(".edit-note").html('<i class="fa fa-pencil" aria-hidden="true"> Edit </i>');
    thisNote.find(".note-title-field, .note-body-field").attr('readonly', 'readonly').removeClass('note-active-field');
    thisNote.find(".update-note").removeClass('update-note--visible');
    thisNote.data('state','cancel');
  }


}

export default Notes;
