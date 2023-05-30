window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });


// window.Echo.channel('AreaParkir').listen('AreaParkirUpdated', (e) => {

//     if(document.querySelector(`.parking-slot[data-id="${e.kode}"]`)){
//         var slot = document.querySelector(`.parking-slot[data-id="${e.kode}"]`);
//         e.status == 1 ? slot.classList.add('bg-success') : slot.classList.remove('bg-success');
//         e.status == 0 ? slot.classList.add('bg-danger') : slot.classList.remove('bg-danger');
//         console.log(slot.classList);
//     }
// });

const mqtt = require('mqtt')

const clientId = 'mqttx_cf37df64'

// const host = 'ws://broker.emqx.io:8083/mqtt'
const host = 'wss://q7e59bdb.ala.us-east-1.emqxsl.com:8084/mqtt'

const options = {
  keepalive: 60,
  clientId: clientId,
  protocolId: 'MQTT',
  protocolVersion: 4,
  clean: true,
  username: 'solana',
  password: 'solana',
  reconnectPeriod: 1000,
  connectTimeout: 30 * 1000,
  will: {
    topic: 'WillMsg',
    payload: 'Connection Closed abnormally..!',
    qos: 0,
    retain: false
  },
}

console.log('Connecting mqtt client')
const client = mqtt.connect(host, options)

client.on('error', (err) => {
  console.log('Connection error: ', err)
  client.end()
})

client.on('reconnect', () => {
  console.log('Reconnecting...')
})

client.on('connect', () => {
    console.log('Client connected:' + clientId)
    client.subscribe('/parkir', { qos: 0 }, (error) => {
          if (!error) {
              console.log('Subscribed to /parkir topic!')
          }else{
              console.log('Error subscribing to /parkir topic!')
          }
    })
    client.on('message', (topic, message) => {
        // console.log('message received: ', message.toString())
        var msg = JSON.parse(message.toString());
        var data = msg['data'];
        // console.log(data);
        if(document.getElementById('areaParkir')){
            data.forEach((item) => {
                if(document.querySelector(`.parking-slot[data-id="${item.kode}"]`)){
                    var slot = document.querySelector(`.parking-slot[data-id="${item.kode}"]`);
                    item.isOccupied == 0 ? slot.classList.add('bg-success') : slot.classList.remove('bg-success');
                    item.isOccupied == 1 ? slot.classList.add('bg-danger') : slot.classList.remove('bg-danger');
                    // console.log(slot.classList);
                }
            })
        }
        // const isAllOccupied = data.every((item) => item.isOccupied)
        // console.log('Is Area Parkir Full: ', isAllOccupied);
    })
})
