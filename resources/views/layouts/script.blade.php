
    <script src="{{ asset('vendor/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>

    <script>
        (function () {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
                })
            })()

        CKEDITOR.replace('ckeditor');
        CKEDITOR.config.entities = false; //khong bi loi font khi insert
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('vendor/multiselect/js/chosen.jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/multiselect/js/main.js') }}"></script>
    <script>
        $('input[type="number"]').on('input', function(){
            if($(this).attr('maxLength') !== undefined){
                this.value = this.value.slice(0,this.getAttribute('maxLength'))
            }
        })

        if($('[name="branch"]').val() == ''){
            $('[name^="class"]').prop('disabled', true);
        }

        $('[name="branch"]').on('change', function(){
            let facultyId = $(this).val() == '' ? 0 : $(this).val();
            const url = '/get-class/' + facultyId;
            $.get(
                url
            ,
            (result) => {
                let classList = `<option label="Khoa"></option>`;
                let chosenList = '';
                result.map((item, index) => {
                    classList += `<option value="${item.id}">${item.name}</option>`;
                    chosenList += `<li class="active-result" data-option-array-index="${index}">${item.name}</li>`
                })
                $('[name^="class"]').html(classList);
                if($(this).val() == ''){
                    $('[name^="class"]').prop('disabled', true);
                    $('.chosen-select').chosen('destroy').chosen();
                    $('.chosen-container').addClass('chosen-disabled');
                }
                else{
                    $('[name^="class"]').prop('disabled', false);
                    $('.chosen-container').removeClass('chosen-disabled');
                    $('.chosen-select').chosen('destroy').chosen();
                    $('.chosen-results').html(chosenList);
                }
            })
        })
    </script>
@stack('javascript')
