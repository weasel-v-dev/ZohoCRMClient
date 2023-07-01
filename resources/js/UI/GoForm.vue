<template>
    <div class="suka">
        <validation-observer
            ref="observer"
            v-slot="{ invalid }"
        >
            <form @submit.prevent="submit">
                <validation-provider
                    v-slot="{ errors }"
                    name="DealName"
                    rules="required|max:50"
                >
                    <v-text-field
                        v-model="dealName"
                        :error-messages="errors"
                        label="Deal Name"
                        required
                    ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    name="Stage"
                    rules="required|max:50"
                >
                    <v-text-field
                        v-model="stage"
                        :error-messages="errors"
                        label="Stage"
                        required
                    ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    name="AccountName"
                    rules="required|max:50"
                >
                    <v-text-field
                        v-model="accountName"
                        :error-messages="errors"
                        label="Account Name"
                        required
                    ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    name="Phone"
                    :rules="{
          required: true,
          max: 15,
          regex: '^[\\+]?[(]?[0-9]{3}[)]?[-\\s\\.]?[0-9]{3}[-\\s\\.]?[0-9]{4,6}$'
        }"
                >
                    <v-text-field
                        v-model="phone"
                        :error-messages="errors"
                        label="Account Phone"
                        required
                    ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    name="Email"
                    rules="required|email"
                >
                    <v-text-field
                        v-model="email"
                        :error-messages="errors"
                        label="E-mail"
                        required
                    ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    name="Website"
                    :rules="{
                      required: true,
                      regex: 'https?:\\/\\/(www\\.)?[-a-zA-Z0-9@:%._\\+~#=]{1,256}\\.[a-zA-Z0-9()]{1,6}\\b([-a-zA-Z0-9()@:%_\\+.~#?&//=]*)'
                    }">
                        <v-text-field
                            v-model="website"
                            :error-messages="errors"
                            label="Account Website"
                            required
                        ></v-text-field>
                </validation-provider>
                <validation-provider
                    v-slot="{ errors }"
                    rules="required"
                    name="checkbox"
                >
                    <v-checkbox
                        v-model="checkbox"
                        :error-messages="errors"
                        value="1"
                        label="Option"
                        type="checkbox"
                        required
                    ></v-checkbox>
                </validation-provider>
                <v-btn
                    class="mr-4"
                    type="submit"
                    :disabled="invalid"
                >
                    submit
                </v-btn>
                <v-btn @click="clear">
                    clear
                </v-btn>
            </form>
        </validation-observer>
    </div>
</template>

<script>
import { required, digits, email, max, regex } from 'vee-validate/dist/rules'
import { extend, ValidationObserver, ValidationProvider, setInteractionMode } from 'vee-validate'

setInteractionMode('eager')

extend('digits', {
    ...digits,
    message: '{_field_} needs to be {length} digits. ({_value_})',
})

extend('required', {
    ...required,
    message: '{_field_} can not be empty',
})

extend('max', {
    ...max,
    message: '{_field_} may not be greater than {length} characters',
})

extend('regex', {
    ...regex,
    message: '{_field_} {_value_} isn\'t correct',
})

extend('email', {
    ...email,
    message: 'Email must be valid',
})
export default {
    components: {
        ValidationProvider,
        ValidationObserver,
    },
    data: () => ({
        dealName: '',
        accountName: '',
        phone: '',
        email: '',
        website: '',
        checkbox: null,
        stage: ''
    }),

    methods: {
        submit () {
            console.log(this.$refs.observer.validate())
            this.send();
        },
        clear () {
            this.dealName = ''
            this.accountName = ''
            this.phone = ''
            this.email = ''
            this.website = ''
            this.stage = ''
            this.checkbox = null
            this.$refs.observer.reset()
        },
        send() {
            const data = {};
            data.dealName = this.dealName;
            data.accountName = this.accountName;
            data.stage = this.stage;
            data.phone = this.phone;
            data.email = this.email;
            data.website = this.website;
            axios.post('/account', data).then(function ({ data }){
                console.log('data', data)
            }).catch(function ({ rej }) {
                console.log('rej', rej)
            }).finally(function ({ mes }){
                console.log('mes', mes)
            })
        }
    }
}
</script>

<style scoped>

</style>
