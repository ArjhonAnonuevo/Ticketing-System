document.addEventListener('DOMContentLoaded', function() {
    const selectBranch = document.getElementById('branch');
    const otherInputContainer = document.getElementById('other-input-container');

    if (selectBranch) {
        selectBranch.addEventListener('change', function() {
            if (this.value === 'Others') {
                otherInputContainer.style.display = 'block'; 
            } else {
                otherInputContainer.style.display = 'none'; 
            }
        });
    } else {
        console.error('Select element with ID "branch" not found');
    }
});
