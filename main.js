document.addEventListener('alpine:init', () => {
    Alpine.data('addlead', () => ({
        greeting: 'addlead app ',
        lead: {
            firstName: 'anon',
            lastName: 'ymous',
            phone: '044123942',
            email: 'cryptohomyak@hamsters.com',
        },
        message: '',
        sendMessage: async function () {
            let request = this.lead; // {value:42};
            console.log(request);
            try {
                const response = await fetch('addlead.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify(request),
                });

                const data = await response.json();

                if (data.success) {
                    this.message = 'Message sent successfully!';
                    console.log(data);
                } else {
                    this.message = 'Failed to send message. Please try again.';
                }

            } catch (error) {
                console.error('Error:', error);
                this.message = 'An error occurred while sending the message.';
            }
            console.log(this.message);
        }
    }));

    Alpine.data('getstatuses', () => ({
        greeting: 'getstatuses app ',
        start: '2024-04-01',
        end: '2024-04-30',
        statuses: [],
        getStatuses: async function () {
            try {
                const response = await fetch(`getstatuses.php?start=${this.start}&end=${this.end}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                    }});
                if (!response.ok) {
                    throw new Error(`HTTP error! Status: ${response.status}`);
                }
                const json = await response.json();
                console.log(json);
                this.statuses = json.data;
            }
            catch (e) {
            }
        }
    }));
})