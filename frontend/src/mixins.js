import Vue from 'vue';

export default Vue.mixin({
	methods: {

		redirect (route_name, params = {}, query = {}) {
			this.$router.push({ name: route_name , params : params, query: query })
		},

		// method, url, params, options
		axiosRequest (method, url, params, headers, api_token = true) {

			//  CHECK GET PARAMS
			url =  (url.includes('?') ? url + '&' : url + '?')
			// CHECK API TOKEN
			// url = (api_token == true ? url + 'at=' + this.$session.get('_at') + "&ui=" + this.$session.get('_ui') : url)

			// ***************
			const instance = this.$axios({
				method: method,
				url: url,
				data: params,
				headers: headers,
				timeout: 60000,
				responseType: 'json',
			});

			// ***************
			let checker = instance
			// ***************
			checker.then(res => {
				if (res.data.status == 'invalid_token') {
					this.clearSession()
					window.location.href = this.$store.state.portal_url + '/login?s=err&m=Invalid token - Please login again'
				}
			})
			checker.catch(error => {
				console.log({request_error: error})

			})
			// RETURN INSTANCE
			return instance;
		},

	}
})
