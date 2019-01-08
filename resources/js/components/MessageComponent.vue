<template>
    <li class="dropdown messages-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-envelope-o"></i>
            <span class="label label-success">4</span>
        </a>
        <ul class="dropdown-menu">
            <li class="header">You have 4 messages</li>
            <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                    <li><!-- start message -->
                        <a href="#">
                            <h4>
                                example title
                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                            </h4>
                            <p>example message</p>
                        </a>
                    </li>
                    <!-- end message -->
                    <li v-for="name in names">
                        <a href="#">
                            <h4>
                                {{ name.name }}
                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                            </h4>
                            <p>{{ name.message }}</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="footer"><a href="#">See All Messages</a></li>
        </ul>
    </li>
</template>

<script>
    export default {
        name: "MessageComponent",
        data () {
            return {
                names: []
            }
        },
        mounted() {
            let that = this
            // 12. 创建 Echo 监听
            Echo.channel('rss')
                .listen('MessageEvent', (e) => {
                    that.names.push({
                        name: e.name,
                        message : e.message
                    })
                });
        }
    }
</script>

<style scoped>

</style>