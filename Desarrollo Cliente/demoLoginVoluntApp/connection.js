document.getElementById('userForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const userData = {
        name: document.getElementById('name').value,
        email: document.getElementById('email').value,
        password: document.getElementById('password').value,
        password_confirmation: document.getElementById('password_confirmation').value
    };

    try {
        const response = await fetch('http://localhost/VoluntApp/app/Server/public/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'include',
            body: JSON.stringify(userData)
        });

        const data = await response.json();
        
        if (response.ok) {
            alert('Registration successful!');
            document.getElementById('userForm').reset();
        } else {
            alert(data.message || 'Registration failed');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred during registration');
    }
});