<template>
    <div class='input-group date'>
        <input type='text' class="form-control" />
        <span class="input-group-addon">
            <span class="glyphicon glyphicon-calendar"></span>
        </span>
    </div>
</template>
 
<script type="text/javascript">
var $ = window.jQuery = require('jquery')
import moment from 'moment'
import eonosdandatetimepicker from 'eonasdan-bootstrap-datetimepicker'
 
export default {
  name: 'vue-datetimepicker',
  data () {
    return {
      value: ''
    }
  },
  watch: {
    options: function (options) {
      // update options
      $(this.$el).datetimepicker({ data: options })
    }
  },
  mounted: function () {
    var vm = this
    var mycomp = $(this.$el).datetimepicker({})
    mycomp.on('dp.change', function (e) {
      vm.value = e.date
      vm.$emit('change', vm.value)
    })
  },
  destroyed: function () {
    $(this.$el).off().datetimepicker('destroy')
  }
}
</script>
 
