    setTimeout(function() {
        const message = document.getElementById('message');
        const errorMessage = document.getElementsByClassName('error-message');
        message.style.display = 'none';
        setTimeout(function() {
        message.parentNode.removeChild(message);
        errorMessage.parentNode.removeChild(errorMessage);
    }, 500);
    }, 5000);

    const checkbox = document.getElementById('is_active_checkbox');
    checkbox.addEventListener('change', function() {
    if (this.checked) {
            this.value = 1;
    } else {
            this.value = 0;
        }
    });

    const roleSelect = document.getElementById('roles');

    roleSelect.addEventListener('change', function() {
        const selectedRoles = Array.from(this.options)
            .filter(option => option.selected)
            .map(option => option.value); 
    });

    const roleSelectUpdate = document.getElementById('roles-update');

    roleSelect.addEventListener('change', function() {
        const selectedRoles = Array.from(this.options)
            .filter(option => option.selected)
            .map(option => option.value); 
    });


    const selectRowCheckBox = document.getElementById('select-row-check');
    const childRows = document.querySelectorAll('.child-row');
    const selectChildRowCheckBoxs = document.querySelectorAll('.select-child-row-checkbox');

    selectRowCheckBox.addEventListener('change', function() {
        selectChildRowCheckBoxs.forEach(selectChildRowCheckBox => {
            if (selectRowCheckBox.checked) {
                selectChildRowCheckBox.checked = true;
            } else {
                selectChildRowCheckBox.checked = false;
            }
        });

    });


    

    

