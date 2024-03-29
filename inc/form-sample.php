<?php
?>
<div id="app">

    <form class="vue-form" @submit.prevent="submit">

        <div class="error-message">
            <p v-show="!email.valid">Oh, please enter a valid email address.</p>
        </div>

        <fieldset>
            <legend>Vue Contact Form</legend>
            <div>
                <label class="label" for="name">Name</label>
                <input type="text" name="name" id="name" required="" v-model="name">
            </div>
            <div>
                <label class="label" for="email">Email</label>
                <input type="email" name="email" id="email" required=""
                       :class="{ email , error: !email.valid }"
                       v-model="email.value">
            </div>
            <div>
                <h4>Team Member</h4>
                <p class="select">
                    <select class="budget" v-model="selection.member">
                        <option value="0">Sarah Drasner</option>
                        <option value="1">Evan You</option>
                    </select>
                </p>
            </div>

            <div>
                <h4>Framework</h4>

                <ul class="vue-form-list">
                    <li>
                        <input type="radio" name="radio-1" id="radio-1" value="angular"
                               v-model="selection.framework">
                        <label for="radio-1">AngularJS</label>
                    </li>
                    <li>
                        <input type="radio" name="radio-2" id="radio-2" value="react"
                               v-model="selection.framework">
                        <label for="radio-2">ReactJS</label>
                    </li>
                    <li>
                        <input type="radio" name="radio-3" id="radio-3" value="vue"
                               v-model="selection.framework">
                        <label for="radio-3">VueJS</label>
                    </li>
                </ul>
            </div>

            <div>
                <h4>Features</h4>
                <ul class="vue-form-list">
                    <li v-for="(feature, index) in features">
                        <input type="checkbox"
                               :value="feature"
                               :id="'cb-feature-'+index"
                               v-model="selection.features">
                        <label :for="'cb-feature-'+index">{{feature}}</label>
                    </li>
                    <li>
                        <input type="checkbox" id="checkbox-all" @click="checkAll">
                        <label for="checkbox-all">Check All</label>
                    </li>
                </ul>
            </div>
            <div>
                <label class="label" for="textarea">Message with Counter</label>
                <textarea class="message" name="textarea" id="textarea" required=""
                          v-model="message.text"
                          :maxlength="message.maxlength"></textarea>
                <span class="counter">{{ message.text.length }} / {{ message.maxlength }}</span>
            </div>
            <div>
                <input type="submit" value="Send Form">
            </div>
        </fieldset>
    </form>

    <div class="debug">
        <pre><code>{{ $data }}</code></pre>
    </div>

</div>
