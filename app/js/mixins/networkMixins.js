const noop = () => {};

import axios from 'axios';

const axiosClient = axios.create({
    responseType: 'json',
    headers: {
        'Content-Type': 'application/json',
        Accept: 'application/json',
    },
});

export default {
    data: function () {
        return {
            networkProcessing: false,
            errors: []
        }
    },
    methods: {
        async helpPost(route, params, onSuccess = noop){
            try {
                if (this.networkProcessing) {
                    return false;
                }

                this.networkProcessing = true;
                const {data} = await axiosClient.post(route, params);
                onSuccess(data);
                this.networkProcessing = false;
            }
            catch(error) {
                this.networkProcessing = false;
                this.errors = error.response.data.errors;
            }
        },
        getErrorMessage(errorArray) {
            return errorArray.join(' ');
        }
    },
}