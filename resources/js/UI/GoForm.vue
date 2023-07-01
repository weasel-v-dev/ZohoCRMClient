<template>
    <validation-observer
            ref="observer"
            v-slot="{ invalid }"
        >
            <form @submit.prevent="submit">
                <div class="row">
                    <div class="col-md-6">
                        <h3><b>Deal information</b></h3>
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
                            name="DealOwner"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="dealOwner"
                                :error-messages="errors"
                                label="Deal Owner"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Amount"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="amount"
                                :error-messages="errors"
                                label="Amount"
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
                            name="closingDate"
                            rules="required"
                            class="position-relative"

                        >
                            <v-text-field
                                v-model="closingDate"
                                :error-messages="errors"
                                label="Closing Date"
                                required
                                @click="triggerModalDate = true"
                            ></v-text-field>
                            <div class="position-absolute z-1 start-0">
                                <v-date-picker v-if="triggerModalDate" @change="triggerModalDate = false"  v-model="closingDate"></v-date-picker>
                            </div>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Probability"
                            rules="required|max:3|min_value:0|max_value:100"
                        >
                            <v-text-field
                                v-model="probability"
                                :error-messages="errors"
                                label="Probability"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="dealDescription"
                            rules="required|max:500"
                        >
                            <v-textarea
                                v-model="dealDescription"
                                :error-messages="errors"
                                label="Deal description"
                                required
                            ></v-textarea>
                        </validation-provider>
                    </div>
                    <div class="col-md-6">
                        <h3 class="mt-3 mt-md-0 "><b>Account information</b></h3>
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
                            name="AccountOwner"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="accountOwner"
                                :error-messages="errors"
                                label="Account owner"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="accountType"
                            rules="required"
                        >
                            <v-select
                                v-model="accountType"
                                :items="['Customer']"
                                :error-messages="errors"
                                label="Account type"
                                data-vv-name="select"
                                required
                            ></v-select>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="BillingAddress"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="billingAddress"
                                :error-messages="errors"
                                label="Billing address"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="ShippingAddress"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="shippingAddress"
                                :error-messages="errors"
                                label="Shipping address"
                                required
                            ></v-text-field>
                        </validation-provider>

                        <validation-provider
                            v-slot="{ errors }"
                            name="Phone"
                            :rules="{
                      required: true,
                      max: 18,
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
                            name="industry"
                            rules="required|max:50"
                        >
                            <v-text-field
                                v-model="industry"
                                :error-messages="errors"
                                label="Industry"
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
                    </div>
                </div>
            </form>
        </validation-observer>
</template>

<script>
import { required, digits, email, max, max_value, min_value, regex } from 'vee-validate/dist/rules'
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

extend('max_value', {
    ...max_value,
    message: '{_value_} must be not more than 100',
})

extend('min_value', {
    ...min_value,
    message: '{_value_} must be not less than 0',
})
export default {
    components: {
        ValidationProvider,
        ValidationObserver,
    },
    data: () => ({
        dealName: '',
        dealOwner: '',

        amount: '',
        stage: '',
        closingDate: '',
        probability: '',
        dealDescription: '',


        accountName: '',
        accountOwner: '',
        accountType: '',
        billingAddress: '',
        shippingAddress: '',
        phone: '',
        email: '',
        website: '',
        industry: '',


        checkbox: null,
        triggerModalDate: false
    }),

    methods: {
        submit () {
            this.send();
        },
        clear () {
            this.dealName = ''

            this.dealOwner = ''
            this.amount = ''
            this.stage = ''
            this.closingDate = ''
            this.probability = ''
            this.dealDescription = ''


            this.accountName = ''
            this.accountOwner = ''
            this.accountType = ''
            this.billingAddress = ''
            this.shippingAddress = ''
            this.phone = ''
            this.email = ''
            this.website = ''
            this.industry = ''

            this.checkbox = null
            this.$refs.observer.reset()
        },
        send() {
            const data = {};
            data.dealName = this.dealName;

            data.dealOwner = this.dealOwner;
            data.amount = this.amount;
            data.stage = this.stage;
            data.closingDate = this.closingDate;
            data.probability = this.probability;
            data.dealDescription = this.dealDescription;


            data.accountName = this.accountName;
            data.accountOwner = this.accountOwner;
            data.accountType = this.accountType;
            data.billingAddress = this.billingAddress;
            data.shippingAddress = this.shippingAddress;
            data.phone = this.phone;
            data.email = this.email;
            data.website = this.website;
            data.industry = this.industry;
            axios.post('/account', data).then(function ({ data }){
                console.log('data', data)
            }).catch(function (rej ) {
                console.log('rej', rej)
            }).finally(function (mes){
                console.log('mes', mes)
            })
        }
    }
}
</script>

<style scoped>

</style>
