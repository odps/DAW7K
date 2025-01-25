document.getElementById('forgotForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const emailData = {
        email: document.getElementById('email').value
    };

    try {
        const response = await fetch('http://localhost/VoluntApp/app/Server/public/api/forgot-password', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-Requested-With': 'XMLHttpRequest'
            },
            credentials: 'include',
            body: JSON.stringify(emailData)
        });

        const data = await response.json();
        
        if (response.ok) {
            alert('Password reset link sent to your email!');
            document.getElementById('forgotForm').reset();
        } else {
            alert(data.message || 'Password reset request failed');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('An error occurred while processing your request');
    }
});