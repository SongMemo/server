const Home = () => import('~/pages/home').then(m => m.default || m)
const Welcome = () => import('~/pages/welcome').then(m => m.default || m)

const Login = () => import('~/pages/auth/login').then(m => m.default || m)
const Register = () => import('~/pages/auth/register').then(m => m.default || m)
const PasswordReset = () => import('~/pages/auth/password/reset').then(m => m.default || m)
const PasswordRequest = () => import('~/pages/auth/password/email').then(m => m.default || m)

const Settings = () => import('~/pages/settings/index').then(m => m.default || m)
const SettingsProfile = () => import('~/pages/settings/profile').then(m => m.default || m)
const SettingsPassword = () => import('~/pages/settings/password').then(m => m.default || m)

const Songs = () => import('~/pages/songs/index').then(m => m.default || m)
const SongsAdd = () => import('~/pages/songs/add').then(m => m.default || m)
const SongsView = () => import('~/pages/songs/view').then(m => m.default || m)
const SongsEdit = () => import('~/pages/songs/edit').then(m => m.default || m)

export default [
  { path: '/', name: 'welcome', component: Welcome },

  { path: '/login', name: 'login', component: Login },
  { path: '/register', name: 'register', component: Register },
  { path: '/password/reset', name: 'password.request', component: PasswordRequest },
  { path: '/password/reset/:token', name: 'password.reset', component: PasswordReset },

  { path: '/home', name: 'home', component: Home },
  { path: '/settings', component: Settings, children: [
    { path: '', redirect: { name: 'settings.profile' }},
    { path: 'profile', name: 'settings.profile', component: SettingsProfile },
    { path: 'password', name: 'settings.password', component: SettingsPassword }
  ] },

  // Songs
  { path: '/songs', name: 'songs', component: Songs },
  { path: '/songs/:id', name: 'songs.view', component: SongsView },
  { path: '/songs/add', name: 'songs.add', component: SongsAdd },
  { path: '/songs/edit/:id', name: 'songs.edit', component: SongsEdit },

  { path: '*', component: require('~/pages/errors/404.vue') }
]
