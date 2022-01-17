import React,{Component, useState} from "react";
import { Text,TouchableOpacity,SafeAreaView,View,TextInput,StyleSheet, BackHandler } from "react-native";
import { Ionicons,AntDesign } from "@expo/vector-icons";
import { auth, database } from "../firebase";
import { useNavigation } from "@react-navigation/native";
// import SignIn from "./SignIn";

import { saveUser } from "./profiledata";
import { sendSignInLinkToEmail } from "firebase/auth";
import Profile from "./Profile";


const EditProfile =() =>{
  const navigation = useNavigation()

  const [Id,setId] = useState()
  const [name,setName] = useState('')
  const [email,setEmail] = useState(auth.currentUser.email)
  const [primaryskill,setPrimaryskill] = useState('')
  const [secondaryskill,setSecondaryskill] = useState('')
  const [skill,setSkill] = useState('')
  // const getuser = () =>{
  //   database.ref('users/').on('value',snapshot =>{
  //     const post = snapshot.val();
  //     console.log(post);
  //   })
  // }
  const handleInsertUpdate = () => {
    
    saveUser(Id,name,email,primaryskill,secondaryskill,skill)
      .then((result) => {
        setId(Id);
        setName(name);
        setEmail(email);
        setPrimaryskill(primaryskill);
        setSecondaryskill(secondaryskill);
        setSkill(skill);
        alert("Profile Updated");
      })
      .catch((error) => {
        console.log(error);
      });
  };


//   const handleSignOut = () =>{
//     auth.signOut()
//     .then(()=>{
//       navigation.navigate(SignIn)
//     })
//     .catch(error =>alert(error.message))
//   }

    return(
       
       <View style = {{alignItems : "center"}}>
              <Text style={styles.text}>EDIT PROFILE</Text>
            <View style={styles.view}>  
              <Ionicons name = 'person' size={25}/>
              <TextInput style={styles.input} placeholder ="Name" 
                value={name} onChangeText={text=>setName(text)}/>
            </View>              
            <View style={styles.view}>
              <Ionicons name = 'mail' size={25}/>
              <TextInput style={styles.input} placeholder ="E-Mail"> 
                 {auth.currentUser.email}</TextInput>
            </View>        
            <View style={styles.view}>
            <AntDesign name="checkcircle" size={20} color="green"/> 
              {/* <Ionicons name = 'phone-portrait-outline' size={25}/> */}
              <TextInput style={styles.input} placeholder ="Skill1" 
                value={primaryskill} onChangeText={text=>setPrimaryskill(text)}/>
            </View>
            <View style={styles.view}>
            <AntDesign name="checkcircle" size={20} color="green"/> 
              {/* <Ionicons name = 'calendar' size={25}/> */}
              <TextInput style={styles.input}  placeholder ="skill2" 
                value={secondaryskill} onChangeText={text=>setSecondaryskill(text)}/>
            </View>
            <View style={styles.view}>
            <AntDesign name="checkcircle" size={20} color="green"/> 
              {/* <Ionicons name = 'male-female' size={25}/> */}
              <TextInput style={styles.input} placeholder ="skill3"
                value={skill} onChangeText={text=>setSkill(text)}/>
            </View>          
            <View style = {styles.view}>
              <TouchableOpacity style={styles.btn} onPress={handleInsertUpdate}>
                <Text style={{fontSize:25,fontWeight:"bold",color:"#E6DDC4"}} >UPDATE</Text>
              </TouchableOpacity>
              <TouchableOpacity style={styles.btn} onPress={()=>navigation.navigate(Profile)} >
                <Text style={{fontSize:25,fontWeight:"bold",color:"#E6DDC4"}} >Profile</Text>
              </TouchableOpacity>
            </View>
            {/* <View style = {styles.view}>
              <TouchableOpacity style={styles.btn} onPress={handleSignOut}>
                <Text style={{fontSize:25,fontWeight:"bold",color:"#E6DDC4"}}>SIGN OUT</Text>
              </TouchableOpacity>
            </View> */}
        </View> 
      
    );
  }

  
const styles = StyleSheet.create({
    SafeAreaView : {
     paddingHorizontal:10,
     flex:1,
     alignContent:"center",
    },
    view:{
      flexDirection : "row",
      alignItems:"center",
      marginLeft:20,
      marginBottom:20,
   },
   btn:{
     height: 40,
     width:150,
     margin: 10,
     marginBottom:50,
     marginTop:0,
     alignItems:"center",
     borderWidth: 0.5,
     borderRadius:15,
     backgroundColor:"#D06224",
     
   },
    input:{
     height: 40,
     width:270,
     marginLeft: 10,
     marginBottom:15,
     borderWidth: 1.5,
     padding: 10,
     textAlign:"left",
     borderRadius: 15,
     fontSize:15,
     fontWeight:'bold',
    },
    image:{ 
        height:'100%',
        width:'100%',
    },
    text:{
     margin:25,
     marginTop:50,
     fontSize:35,
     textAlign:"center",
     fontWeight:"bold",
     color:"#D06224",
    },
 });
 
export default EditProfile;
// onPress={()=>navigation.navigate(Profile)}