document.addEventListener('DOMContentLoaded', () => {
    const logoutBtn = document.querySelector('.logout-btn');
    
    logoutBtn.addEventListener('click', async () => {
        try {
            const token = localStorage.getItem('jwt');
            
            if (!token) {
                window.location.href = 'index.html';
                return;
            }

            const response = await fetch('http://localhost/VoluntApp/app/Server/public/api/logout', {
                method: 'POST',
                headers: {
                    'Authorization': `Bearer ${token}`,
                    'Content-Type': 'application/json'
                }
            });

            if (response.ok) {
                // Clear all auth-related data
                localStorage.removeItem('jwt');
                localStorage.removeItem('user');
                // Redirect to index page
                window.location.href = 'index.html';
            } else {
                throw new Error('Logout failed');
            }
        } catch (error) {
            console.error('Logout error:', error);
            alert('Failed to logout. Please try again.');
        }
    });
});