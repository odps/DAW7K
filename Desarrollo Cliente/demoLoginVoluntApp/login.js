document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const loginData = {
        email: document.getElementById('email').value,
        password: document.getElementById('password').value
    };

    try {
        const response = await fetch('http://localhost/VoluntApp/app/Server/public/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'include',
            body: JSON.stringify(loginData)
        });

        const data = await response.json();
        
        if (response.ok) {
            console.log('JWT Token:', data.token);
            // Store token in localStorage for future use
            localStorage.setItem('jwt_token', data.token);
            alert('Login successful!');
            document.getElementById('loginForm').reset();
            window.location.href = 'main.html';
        } else {
            alert(data.message || 'Login failed');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred during login');
    }
});