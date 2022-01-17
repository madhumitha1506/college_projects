import React,{useState}from 'react';
import {View,Text,Image,StyleSheet,TextInput,TouchableOpacity} from 'react-native';
import Login from './Login';
// import Home from "./Home";
import { auth } from '../firebase';
import { useNavigation } from "@react-navigation/native";

const Signup=()=> {
    const navigation = useNavigation()
    const [email,setEmail] = useState('')
    const [password,setPassword] = useState('')
    
    const handleSignUp =() =>{
        auth.createUserWithEmailAndPassword(email,password)
        .then(userCredentials =>{
          const user = userCredentials.user;
          console.log(user.email);
          navigation.navigate(Login);
        })
          .catch(error => alert(error.message))
      }
    
        return(
        <View>
            <Image source={require('../assets/signup.jpg')} style ={styles.img}/>
            <View style={styles.text}>
                <TextInput
                style = {styles.input}
                placeholder='Enter FullName'
                placeholderTextColor='#ecf0f1' 
                // onChangeText={username=>this.setState({username})}  
                />
                <TextInput
                style = {styles.input}
                placeholder='Enter Email'
                placeholderTextColor='#ecf0f1'
                value={email}  
                onChangeText={text =>setEmail(text)}                
                />
                <TextInput
                style = {styles.input}
                placeholder='Enter Password'
                placeholderTextColor='#ecf0f1'   
                value={password}
                onChangeText={text => setPassword(text)} 
                />
                
            </View>
            <View>
                <TouchableOpacity style={styles.signup} onPress={handleSignUp} >
                    <Text style={{color:'white',textAlign:'center',fontWeight:'bold',fontSize:18}} >SIGNUP</Text>
                </TouchableOpacity>
            </View>
        </View>
            
        );
    }



const styles =  StyleSheet.create({
    img:{
        width:400,
        height:400
        
    },
    text:{
        marginTop:20
    },
    input:{
        borderWidth:1.5,
        borderColor:'#950101',
        width:'80%',
        marginLeft:40,
        marginBottom:15,
        borderRadius:25,
        backgroundColor:'#e74c3c',
        textAlign:'center',
        padding:15
    },
    signup:{
        borderWidth:1.5,
        borderColor:'#FF8243',
        padding:15,
        width:'50%',
        marginTop:10,
        marginLeft:'30%',
        borderRadius:25,
        backgroundColor:'#FDA65D'
    }
});


export default Signup;