    $('form.voice-form').submit(function(e) {
        e.preventDefault();
      
        var this_form = $(this);
        var action = $(this).attr('action');
        var data = this_form.serialize();
  
        var form_content;
        form_content = this_form.find('#btnSubmit').html();
        this_form.find('#btnSubmit').html('<i class="bx bx-loader-circle bx-spin bx-flip-horizontal" ></i>');
        $(".voice-form :input").prop("disabled", true);

        if( ! action ) {
            this_form.find('.error-message').slideDown().html('The form action property is not set!');
            return false;
        }
      
        this_form.find('.sent-message').slideUp();
        this_form.find('.error-message').slideUp();
  
        php_email_form_submit(this_form, action, data, form_content);
        return true;
    });
  
    function php_email_form_submit(this_form, action, data, form_content) {
        $.ajax({
            type: "POST",
            url: action,
            data: data,
            timeout: 40000
        }).done( function(msg){
            if (msg.trim() == 'OK') {
                this_form.find('.sent-message').slideDown();        
                this_form.find("input:not(input[type=submit]), select").val('');
                this_form.find('#btnSubmit').html(form_content);
                $(".voice-form :input").prop("disabled", false);
                $(".progress-bar").width('0%');   
                document.getElementById("selectedWordDisplay").innerHTML = ""; 
                setTimeout(function(){ this_form.find('.sent-message').slideUp(); }, 3000);
            }
            else {
                if(!msg) {
                    msg = 'Form submission failed and no error message returned from: ' + action + '<br>';
                }
                this_form.find('.error-message').slideDown().html(msg);
                this_form.find('#btnSubmit').html(form_content);
                $(".voice-form :input").prop("disabled", false);
            }
        }).fail( function(data){
            console.log(data);
            var error_msg = "Form submission failed!<br>";
            if(data.statusText || data.status) {
                error_msg += 'Status:';
                if(data.statusText) {
                    error_msg += ' ' + data.statusText;
                }
                if(data.status) {
                    error_msg += ' ' + data.status;
                }
                error_msg += '<br>';
            }
            if(data.responseText) {
                error_msg += data.responseText;
            }
            this_form.find('.error-message').slideDown().html(error_msg);
            this_form.find('#btnSubmit').html(form_content);
            $(".voice-form :input").prop("disabled", false);
        });
    }
