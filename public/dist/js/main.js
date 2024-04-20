    setTimeout(function() {
        const message = document.getElementById('message');
        const errorMessage = document.getElementsByClassName('error-message');
        message.style.display = 'none';
        setTimeout(function() {
        message.parentNode.removeChild(message);
        errorMessage.parentNode.removeChild(errorMessage);
    }, 500);
    }, 5000);

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


    

    

