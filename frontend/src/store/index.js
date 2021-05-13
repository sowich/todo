import Vue from 'vue'
import Vuex from 'vuex'
import axios from "axios";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        notes: {}
    },
    mutations: {
        notes(state, notes) {
            state.notes = notes;
        }
    },
    actions: {
        note(context, data) {
            return new Promise((resolve, reject) => {
                axios.put('/' + data.ID, data)
                    .then(() => {
                        console.log('OK');
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        },
        notes(context, data) {
            return new Promise((resolve, reject) => {
                axios.get('/' + data)
                    .then(response => {
                        const notes = response.data;
                        context.commit('notes', notes);
                        resolve(notes);
                    })
                    .catch(error => {
                        reject(error);
                    });
            });
        }
    },
    modules: {}
})
