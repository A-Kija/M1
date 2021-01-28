require('./bootstrap');



window.addEventListener('DOMContentLoaded', () => {
    if (document.querySelector('#authors-list')) {
        console.log('DOM fully loaded and parsed');

        document.querySelectorAll('[data-sort]').forEach(a => {
            a.addEventListener('click', e => {
                e.preventDefault();

                console.log(sortUrl);

                axios.post(sortUrl + a.dataset.sort, {}, { withCredentials: false })
                    .then(function(response) {
                        // handle success
                        // console.log(response.data.list);
                        document.querySelector('#authors-list').innerHTML = response.data.list;

                    })
                    .catch(function(error) {
                        // handle error
                        console.log(error);
                    })
            })
        })



    }


});