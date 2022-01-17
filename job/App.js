import React from 'react';
// import { View } from 'react-native';

import {NavigationContainer} from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { Ionicons,AntDesign } from '@expo/vector-icons';

// 

import Login from './Components/Login';
import Signup from './Components/Signup';
// import Home from './Components/Home';
import Profile from './Components/Profile';
// import Appointments  from './Components/Jobs';
import Jobs from './Components/Jobs';
import EditProfile from './Components/EditProfile';


const Stack = createNativeStackNavigator();
const Tab = createBottomTabNavigator();


function MainBottomNav() {
  return (
    <Tab.Navigator
      initialRouteName="Jobs"
      tabBarOptions={{activeTintColor: 'black', showLabel: false}}>
        <Tab.Screen
        name="EditProfile"
        component={EditProfile}
        options={{
          tabBarLabel: 'Profile',
          tabBarIcon: () => (
            // <Ionicons name="md-checkmark-circle" size={32} color="green" />
            <AntDesign name="profile" size={24} color="black" />
          ),
        }}
      />
        {/* <Tab.Screen
        name="Home"
        component={Home}
        options={{
          tabBarLabel: 'Home',
          tabBarIcon: () => (
            // <Ionicons name="md-checkmark-circle" size={32} color="green" />
            <AntDesign name="home" size={24} color="black" />
          ),
        }}
      />
       */}
      <Tab.Screen
        name="Jobs"
        component={Jobs}
        options={{
          tabBarLabel: 'Jobs',
          tabBarIcon: () => (
            // <Ionicons name="md-checkmark-circle" size={32} color="green" />
            <AntDesign name="pushpin" size={24} color="black" />
          ),
        }}
      />
       
       

    </Tab.Navigator>
  );
}






export default class App extends React.Component{
  render(){
    return(
        <NavigationContainer>
          <Stack.Navigator screenOptions={{headerShown: false}}>
            <Stack.Screen name="Login" component={Login} />
            <Stack.Screen name="Signup" component={Signup} />
            {/* <Stack.Screen name="Home" component={Home} /> */}
            <Stack.Screen name="Profile" component={Profile} />
            <Stack.Screen name="Main" component={MainBottomNav} />
            
          </Stack.Navigator>
        </NavigationContainer>
    );
  }
}
