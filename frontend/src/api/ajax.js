import axios from 'axios';
import config from '../config.json'

const logIn = async () => {
  return axios.post(`http://127.0.0.1:8200/api/login`, {
      email: config.user,
      password: config.pass
    })
    .then(response => {
      if (response.status == 200) {
        localStorage.setItem("token", response.data.token);

        return response;
      } else {
        alert('Error Login!');
      }
    });

}

const httprequest = async (service, url, method, data) => {

  let urlService = (service == 'store') ? config.store_url : config.kitchen_url;

  return axios({
    method: method,
    url: urlService + url,
    data: data,
    headers: {
      Authorization: `Bearer ${localStorage.token}`
    }
  }).then(response => {
    return response;
  }).catch(e => {
    return e;
  });



}

export {
  logIn,
  httprequest
}